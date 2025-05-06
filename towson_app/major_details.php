<?php
include 'db_connection.php';
$db = connectDB();
$id = $_GET['id'] ?? '';
$query = $db->prepare("SELECT * FROM course WHERE major_id = ?");
$query->execute([$id]);
$courses = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><title>Major Details</title></head>
<body>
<h2>Courses in Major <?= htmlspecialchars($id) ?></h2>
<ul>
<?php foreach ($courses as $course): ?>
    <li>
        <a href="course_details.php?id=<?= $course['course_id'] ?>"><?= $course['course_id'] ?> - <?= $course['course_name'] ?></a>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>