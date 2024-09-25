<?php
require_once 'DataManager.php';

class Grade {
    public static function getGrades($code, $period, $year) {
        $dataManager = new DataManager();

        $query="SELECT GRADE_STUDENT_EPITA_EMAIL_REF AS EMAIL, CONTACT_FIRST_NAME AS FIRST_NAME, CONTACT_LAST_NAME AS LAST_NAME, 
                COURSE_NAME, SUM(GRADE_SCORE) / COUNT(*) AS AVG FROM GRADES
	            INNER JOIN STUDENTS ON GRADE_STUDENT_EPITA_EMAIL_REF = STUDENTS.STUDENT_EPITA_EMAIL 
                INNER JOIN COURSES ON GRADE_COURSE_CODE_REF = COURSES.COURSE_CODE 
                INNER JOIN CONTACTS ON STUDENT_CONTACT_REF = CONTACTS.CONTACT_EMAIL 
                WHERE STUDENT_POPULATION_PERIOD_REF = '$period' AND STUDENT_POPULATION_YEAR_REF = '$year' 
                AND STUDENT_POPULATION_CODE_REF = '$code'
                GROUP BY EMAIL, COURSE_NAME
                ORDER BY EMAIL";

        return $dataManager->getData($query, false);
    }

    public static function editGrades(string $email, string $course, int $grade) {
        $dataManager = new DataManager();
        
        $query = "UPDATE grades
        SET grade_score = $grade
        WHERE grade_student_epita_email_ref = '$email'
        AND grade_course_code_ref IN (SELECT course_code FROM courses WHERE course_name = '$course')";
        $dataManager->exQuery($query);
    }

    public static function deleteGrade(string $email, string $course) {
        $dataManager = new DataManager();
        
        $query = "UPDATE grades
        SET grade_score = 0
        WHERE grade_student_epita_email_ref = '$email'
        AND grade_course_code_ref IN (SELECT course_code FROM courses WHERE course_name = '$course')";
        $dataManager->exQuery($query);
    }
}
?>