<?php
require_once __DIR__ . '/../includes/courses-functions.php';

$area = $_GET['area'] ?? null;

if ($area) {
    $courses = getCoursesByArea($area);
    $title = "Cursos da área: " . ucfirst($area);
} else {
    $courses = getAllCourses();
    $title = "Todos os Cursos";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .course-card {
      transition: transform 0.2s ease-in-out;
    }
    .course-card:hover {
      transform: scale(1.03);
    }
    .course-img {
      height: 180px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4"><?= htmlspecialchars($title) ?></h1>

  <?php if (empty($courses)) : ?>
    <div class="alert alert-warning text-center">
      Nenhum curso encontrado para esta área.
    </div>
  <?php else : ?>
    <div class="row g-4">
      <?php foreach ($courses as $course): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card course-card shadow-sm">
            <img src="<?= htmlspecialchars($course['img']) ?>" class="card-img-top course-img" alt="<?= htmlspecialchars($course['title']) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($course['short_description']) ?></p>
              <p class="text-muted mb-1">
                <strong>Instrutor:</strong> <?= htmlspecialchars($course['instructor']) ?>
              </p>
              <span class="badge bg-primary"><?= htmlspecialchars(ucfirst($course['area'])) ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
