function showname() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("prof_name").innerHTML = xmlhttp.responseText;
        }
    }
        xmlhttp.open("GET", "getname.php", true);
        xmlhttp.send();
}

function showdiet() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("prof_diet").innerHTML = xmlhttp.responseText;
        }
    }
        xmlhttp.open("GET", "getdiet.php", true);
        xmlhttp.send();
}

function showuser() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("prof_user").innerHTML = xmlhttp.responseText;
        }
    }
        xmlhttp.open("GET", "getuser.php", true);
        xmlhttp.send();
}

function showpref() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("prof_pref").innerHTML = xmlhttp.responseText;
        }
    }
        xmlhttp.open("GET", "getpref.php", true);
        xmlhttp.send();
}