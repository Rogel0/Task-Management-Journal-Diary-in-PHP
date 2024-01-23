function updateTaskStatus(taskId, completed) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'phpfiles/updateTaskStatus.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("task-id=" + taskId + "&completed=" + (completed ? 1 : 0));
  }