<?php
require_once 'DataManager.php';

class Program {
    public static function getStudents($code, $period, $year) {
        $dataManager = new DataManager();

        $query="SELECT EMAIL, FIRST_NAME, LAST_NAME, COUNT(case when S >= 8 then 1 end) AS VAL, COUNT(*) AS TOTAL FROM
        (SELECT DISTINCT STUDENT_EPITA_EMAIL AS EMAIL, CONTACT_FIRST_NAME AS FIRST_NAME, CONTACT_LAST_NAME AS LAST_NAME, 
        GRADE_COURSE_CODE_REF, SUM(GRADE_SCORE) / COUNT(*) AS S FROM STUDENTS
        INNER JOIN CONTACTS ON STUDENTS.STUDENT_CONTACT_REF = CONTACTS.CONTACT_EMAIL
        INNER JOIN GRADES ON STUDENTS.STUDENT_EPITA_EMAIL = GRADES.GRADE_STUDENT_EPITA_EMAIL_REF
        WHERE STUDENT_POPULATION_CODE_REF = '$code' AND STUDENT_POPULATION_YEAR_REF =$year AND STUDENT_POPULATION_PERIOD_REF = '$period'
        GROUP BY EMAIL, GRADE_COURSE_CODE_REF
        ORDER BY EMAIL) MY_TABLE
        GROUP BY EMAIL";

        return $dataManager->getData($query, false);
    }

    public static function getCourses($code) {
        $dataManager = new DataManager();

        $query="SELECT course_name AS code, duration, contact_first_name AS f_name, contact_last_name AS l_name
        FROM PROGRAMS
        INNER JOIN courses ON programs.program_course_code_ref = courses.course_code
        INNER JOIN sessions ON programs.program_course_code_ref = sessions.session_course_ref
        INNER JOIN teachers ON sessions.session_prof_ref = teachers.teacher_epita_email
        INNER JOIN contacts ON teachers.teacher_contact_ref = contacts.contact_email
        WHERE program_assignment = '$code'
        GROUP BY code";

        return $dataManager->getData($query, false);
    }
}
?>