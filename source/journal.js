var dropArea = document.getElementById("drop-area");
var fileInput = document.getElementById("file-input");

["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
  dropArea.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}

["dragenter", "dragover"].forEach((eventName) => {
  dropArea.addEventListener(eventName, highlight, false);
});

["dragleave", "drop"].forEach((eventName) => {
  dropArea.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
  dropArea.style.backgroundColor = "lightgray";
}

function unhighlight(e) {
  dropArea.style.backgroundColor = "white";
}

dropArea.addEventListener("drop", handleDrop, false);

function handleDrop(e) {
  var dt = e.dataTransfer;
  var files = dt.files;

  handleFiles(files);
}

function handleFiles(files) {
  [...files].forEach(previewAndUploadFile);
}

function previewAndUploadFile(file) {
    // Preview the image
    var img = document.createElement("img");
    img.src = URL.createObjectURL(file);
    img.className = "thumbnail";
    img.onclick = function() {
      var largeViewImg = document.querySelector("#large-view img");
      largeViewImg.src = this.src;
      document.getElementById("large-view").style.display = "flex"; // show the large view
    };
    document.querySelector(".entry-images").appendChild(img);
  
    // Upload the file
    uploadFile(file);
}

window.addEventListener('load', function() {
    // Hide the large view when it's clicked
    var largeView = document.getElementById("large-view");
    largeView.onclick = function() {
      this.style.display = "none";
    };
});

function uploadFile(file) {
  var url = "/upload"; // Replace with your actual upload URL
  var xhr = new XMLHttpRequest();
  var formData = new FormData();

  xhr.open("POST", url, true);

  xhr.addEventListener("readystatechange", function (e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Done. Inform the user
    } else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  });

  formData.append("file", file);
  xhr.send(formData);
}

function uploadFile(file) {
  var url = "/upload"; // Replace with your actual upload URL
  var xhr = new XMLHttpRequest();
  var formData = new FormData();

  xhr.open("POST", url, true);

  xhr.addEventListener("readystatechange", function (e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Done. Inform the user
    } else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  });

  formData.append("file", file);
  xhr.send(formData);
}
$(document).ready(function () {
  $("#journal-entry form").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "store_journal.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        alert("Journal entry saved!");
      },
    });
    return false;
  });
});
