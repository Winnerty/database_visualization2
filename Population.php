<?php
require_once 'DataManager.php';

class Population {

    public static function getTime() {
        $dataManager = new DataManager();

        $query="SELECT DATE_FORMAT(MAX(update_time), '%Y-%m-%d %H:%i:%s') AS date FROM information_schema.tables
                WHERE table_schema = 's2project1'";

        return $dataManager->getData($query, false);
    }

    public static function getPopulations() {
        $dataManager = new DataManager();

        $query="SELECT student_population_code_ref AS code_ref, student_population_period_ref AS period_ref, 
        student_population_year_ref AS year_ref, COUNT(*) AS cnt FROM STUDENTS
        GROUP BY code_ref, period_ref, year_ref";

        return $dataManager->getData($query, false);
    }

    public static function getAttendances() {
        $dataManager = new DataManager();

        $query="SELECT STUDENT_POPULATION_CODE_REF AS code_ref, STUDENT_POPULATION_PERIOD_REF AS period_ref, 
        STUDENT_POPULATION_YEAR_REF AS year_ref, 100 * SUM(ATTENDANCE_PRESENCE) / COUNT(*) AS percent FROM ATTENDANCE 
        INNER JOIN STUDENTS ON STUDENTS.STUDENT_EPITA_EMAIL = ATTENDANCE.ATTENDANCE_STUDENT_REF 
        GROUP BY code_ref, period_ref 
        ORDER BY code_ref";

        return $dataManager->getData($query, false);
    }

    public static function addStudent(string $f_name, string $l_name, string $personalEmail, string $code, string $period, string $year) {
        $dataManager = new DataManager();

        $epitaEmail = $f_name . "." . $l_name . "@epita.fr";

        $queryContacts = "INSERT INTO contacts (contact_email, contact_first_name, contact_last_name)
                  VALUES ('$personalEmail', '$f_name', '$l_name')";
        
        $dataManager->exQuery($queryContacts);

        $queryStudents = "INSERT INTO students (student_epita_email, student_contact_ref, student_enrollment_status, student_population_period_ref, 
                  student_population_year_ref, student_population_code_ref)
                  VALUES ('$epitaEmail', '$personalEmail', 'completed', '$period', '$year', '$code')";

        $dataManager->exQuery($queryStudents);

        $queryGrades = "INSERT INTO grades (grade_student_epita_email_ref, grade_course_code_ref, grade_course_rev_ref)
                        SELECT '$epitaEmail', program_course_code_ref, program_course_rev_ref FROM programs
                        WHERE program_assignment = '$code'";

        $dataManager->exQuery($queryGrades);

    }

    public static function deleteStudent(string $email) {
        $dataManager = new DataManager();
        
        $queryGrades = "DELETE FROM grades WHERE grade_student_epita_email_ref = '$email'";
        $dataManager->exQuery($queryGrades);

        $queryAttendances = "DELETE FROM attendance WHERE attendance_student_ref = '$email'";
        $dataManager->exQuery($queryAttendances);

        $queryStudents = "DELETE FROM students WHERE student_epita_email = '$email'";
        $dataManager->exQuery($queryStudents);

    }

    public static function editStudent(string $f_name, string $l_name, string $email) {
        $dataManager = new DataManager();
        
        $query = "UPDATE contacts
        SET contact_first_name = '$f_name',
            contact_last_name  = '$l_name'
        WHERE contact_email IN (SELECT student_contact_ref FROM students WHERE student_epita_email = '$email')";
        $dataManager->exQuery($query);

    }

    public static function addCourse(string $code_name, string $full_name, int $sessions, string $teacherEmail, string $program) {
        $dataManager = new DataManager();
        
        $queryCourses = "INSERT INTO courses (course_code, duration, course_name)
                        VALUES ('$code_name', $sessions, '$full_name')";
        $dataManager->exQuery($queryCourses);

        $queryPrograms = "INSERT INTO programs (program_course_code_ref, program_assignment)
                        VALUES ('$code_name', '$program')";
        $dataManager->exQuery($queryPrograms);

        $queryGrades = "INSERT INTO grades (grade_student_epita_email_ref, grade_course_code_ref)
                        SELECT student_epita_email, '$code_name' FROM students
                        WHERE student_population_code_ref = '$program'";
        $dataManager->exQuery($queryGrades);
        
        $querySessions = "INSERT INTO sessions (session_course_ref, session_prof_ref)
                        VALUES ('$code_name', '$teacherEmail')";
        $dataManager->exQuery($querySessions);
    }
}
?>