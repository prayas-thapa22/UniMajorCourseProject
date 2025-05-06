<?php
include 'db_connection.php';
$db = connectDB();
$id = $_GET['id'] ?? '';
$query = $db->prepare("SELECT * FROM course WHERE course_id = ?");
$query->execute([$id]);
$course = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><title>Course Details</title></head>
<body>
<?php if ($course): ?>
    <h2><?= $course['course_id'] ?> - <?= $course['course_name'] ?></h2>
    <p><strong>Description:</strong> <?= $course['course_desc'] ?></p>
    <p><strong>Major:</strong> <a href="major_details.php?id=<?= $course['major_id'] ?>"><?= $course['major_id'] ?></a></p>
    <p><strong>Prerequisite:</strong>
        <?php if ($course['prereq_id']): ?>
            <a href="course_details.php?id=<?= $course['prereq_id'] ?>"><?= $course['prereq_id'] ?></a>
        <?php else: ?> None <?php endif; ?>
    </p>
<?php else: ?>
    <p>Course not found.</p>
<?php endif; ?>
</body>
</html>