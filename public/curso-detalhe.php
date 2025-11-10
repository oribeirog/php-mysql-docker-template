<?php   
include __DIR__ . '/page-top.php';
require_once __DIR__ . '/../includes/courses-functions.php';

$courseId = $_GET['id'] ?? null;

$course = $courseId ? getCourseById($courseId) : null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $course ? htmlspecialchars($course['title']) : 'Curso não encontrado' ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .course-header img {
      max-height: 300px;
      object-fit: cover;
      width: 100%;
      border-radius: 8px;
    }
    .module-list li {
      margin-bottom: 8px;
    }
  </style>
</head>
<body>

<div class="container my-5">

  <?php if (!$course): ?>
    <div class="alert alert-danger text-center">
      <h4>Curso não encontrado 😕</h4>
      <p>Verifique o link ou volte à <a href="cursos.php">lista de cursos</a>.</p>
    </div>
  <?php else: ?>

    <div class="course-header mb-4">
      <h1><?= htmlspecialchars($course['title']) ?></h1>
      <p class="text-muted">Instrutor: <?= htmlspecialchars($course['instructor']) ?></p>
      <img src="<?= htmlspecialchars($course['img']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="mb-3">
    </div>

    <div class="course-details">
      <p class="lead"><?= htmlspecialchars($course['short_description']) ?></p>
      <h4 class="mt-4">Módulos do Curso:</h4>
      <ul class="list-group module-list">
        <?php foreach ($course['modules'] as $module): ?>
          <li class="list-group-item"><?= htmlspecialchars($module) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="mt-4">
      <a href="cursos.php?area=<?= urlencode($course['area']) ?>" class="btn btn-outline-primary">
        ← Voltar para cursos de <?= htmlspecialchars(ucfirst($course['area'])) ?>
      </a>
    </div>

  <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>