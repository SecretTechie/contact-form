document.getElementById("contactForm").onsubmit = function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process_form.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                document.getElementById("statusMessage").innerHTML = xhr.responseText;
            } else {
                console.error("Error:", xhr.statusText);
            }
        }
    };
    xhr.onerror = function() {
        console.error("Request failed");
    };
    xhr.send(formData);
};
