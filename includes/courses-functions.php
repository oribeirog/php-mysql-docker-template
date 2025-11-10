<?php
/**
 * 
 *
 * @return array
 */
function getAllCourses(): array {
    $jsonFile = __DIR__ . '/courses.json'; 
    $jsonData = file_get_contents($jsonFile);
    $courses = json_decode($jsonData, true);

    return is_array($courses) ? $courses : [];
}
/**
 * 
 *
 * @param string $area
 * @return array
 */
function getCoursesByArea(string $area): array {
    $allCourses = getAllCourses();

    $filtered = array_filter($allCourses, function ($course) use ($area) {
        return strtolower($course['area']) === strtolower($area);
    });

    return array_values($filtered);
}
/**
 * 
 * 
 *
 * @param string
 * @return ?array    
 */
function getCourseById(string $id): ?array {
    $allCourses = getAllCourses();

    foreach ($allCourses as $course) {
        if ($course['id'] === $id) {
            return $course;
        }
    }
    return null;
}
