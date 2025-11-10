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
  <title><?= $course ? htmlspecialchars($course['title']) : 'Curso não encontrado' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">

  <?php if ($course): ?>
    <h1><?= htmlspecialchars($course['title']) ?></h1>
    <h4>Instrutor: <?= htmlspecialchars($course['instructor']) ?></h4>
    <p><?= htmlspecialchars($course['short_description']) ?></p>

    <div class="mt-4">
      <h5>Módulos do Curso:</h5>
      <ul class="list-group">
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

  <?php else: ?>
    <div class="container text-center my-5">
      <h2 class="text-danger">Curso não encontrado!</h2>
      <p>O ID fornecido não corresponde a nenhum curso em nosso catálogo.</p>
      <a href="cursos.php" class="btn btn-outline-primary mt-3">← Voltar para os cursos</a>
    </div>
  <?php endif; ?>

</div>

<?php include 'page-bottom.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
