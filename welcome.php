<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- include jquery and bootstrap js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
         
        <!-- include sweetalert for displaying dialog messages -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href="style.css" rel="stylesheet">
 
</head>
<style>
    .alignright { float: right; }
</style>
<body class="bg-dark" id="page-top">

<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="1/index.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Timer</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
      <ul class="navbar-nav">
        <li class="nav-item alignright">
            <b class="alignright" style="color: white;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
          <a href="logout.php" class="btn btn-danger ml-3">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
     
    <!-- button to add task -->
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
            
            <!-- form to delete project -->
<form method="POST" onsubmit="return taskObj.deleteProject(this);" style="display: contents;">
    <select name="project" class="form-control" style="display: initial; width: 200px; margin-left: 5px; margin-right: 5px;" id="form-task-hour-calculator-all-projects"></select>
    <input type="submit" class="btn btn-danger" value="Delete Project">
</form>
            
        </div>
    </div>
 
</div>
<!-- show all tasks -->
<table class="table">
    <caption class="text-center">All Tasks</caption>
        <tr>
            <th>Task</th>
            <th>Project</th>
            <th>Status</th>
            <th>Duration</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
 
    <tbody id="all-tasks"></tbody>
</table>

<!-- modal to add project and task -->
<div class="modal fade" id="addTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Task</h5>
                <button class="close" type="button" data-dismiss="modal">x</button>
            </div>
 
            <div class="modal-body">
                <form method="POST" onsubmit="return taskObj.addTask(this);" id="form-task-hour-calculator">
                     
                    <!-- select project from already created -->
                    <div class="form-group">
                        <label>Project</label>
                        <select name="project" id="add-task-project" class="form-control" required></select>
                    </div>
 
                    <!-- create new project -->
                    <div class="form-group">
                        <label>New Project</label>
                        <input type="text" name="new_project" id="add-project" class="form-control" placeholder="Project Name">
 
                        <button type="button" onclick="taskObj.addProject();" class="btn btn-primary" style="margin-top: 10px;">Add Project</button>
                    </div>
 
                    <!-- enter task -->
                    <div class="form-group">
                        <label>Task</label>
                        <input type="text" name="task" class="form-control" placeholder="What are you going to do ?" required />
                    </div>
                </form>
            </div>
 
            <!-- form submit button -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" form="form-task-hour-calculator" class="btn btn-primary">Add Task</button>
            </div>
                    </div>
                    </div>
                </div>
            </table>
          </div>
        </div>
        
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
    // main object
var taskObj = {
 
    // local storage key
    key: "projects",
    
    
 
    // add project
    addProject: function () {
 
        // check if project is selected
        if (document.getElementById("add-project").value == "") {
            swal("Please enter project name");
            return false;
        }
 
        // initialize local storage if not already initialized
        var option = "";
        if (localStorage.getItem(this.key) == null) {
            localStorage.setItem(this.key, "[]");
        }
 
        // get stored object from local storage
        var data = JSON.parse(localStorage.getItem(this.key));
 
        // project object
        var project = {
            id: data.length,
            name: document.getElementById("add-project").value,
            tasks: []
        };
 
        // push new project in local storage
        data.push(project);
        localStorage.setItem(this.key, JSON.stringify(data));
 
        // re-load all projects
        this.loadAllProjects();
 
        // show all tasks
        this.showAllTasks();
    },
 // get all stored projects
getAllProjects: function() {
    if (localStorage.getItem(this.key) == null) {
        localStorage.setItem(this.key, "[]");
    }
    return JSON.parse(localStorage.getItem(this.key))
},
 
// load all projects in dropdown
loadAllProjects: function () {
    var projects = taskObj.getAllProjects();
    projects = projects.reverse();
    var html = "<option value=''>Select Project</option>";
    for (var a = 0; a < projects.length; a++) {
        html += "<option value='" + projects[a].id + "'>" + projects[a].name + "</option>";
    }
    document.getElementById("add-task-project").innerHTML = html;
    document.getElementById("form-task-hour-calculator-all-projects").innerHTML = html;
},
// add new task
addTask: function (form) {
 
    // get selected project and entered task
    var project = form.project.value;
    var task = form.task.value;
 
    // add task in project's array
    var projects = this.getAllProjects();
    for (var a = 0; a < projects.length; a++) {
        if (projects[a].id == project) {
            var taskObj = {
                id: projects[a].tasks.length,
                name: task,
                status: "Progress", // Progress, Completed
                isStarted: false,
                logs: [],
                started: this.getCurrentTimeInTaskStartEndFormat(),
                ended: ""
            }
            projects[a].tasks.push(taskObj);
            break;
        }
    }
 
    // update local storage
    localStorage.setItem(this.key, JSON.stringify(projects));
 
    // hide modal
    jQuery("#addTaskModal").modal("hide");
    jQuery('.modal-backdrop').remove();
 
    // re-load all tasks
    this.showAllTasks();
 
    // prevent form from submitting
    return false;
},

// get current datetime in proper format (e.g. 2021-06-15 20:53:15)
getCurrentTimeInTaskStartEndFormat() {
    let current_datetime = new Date();
    var date = current_datetime.getDate();
    date = (date < 10) ? "0" + date : date;
    var month = (current_datetime.getMonth() + 1);
    month = (month < 10) ? "0" + month : month;
    var hours = current_datetime.getHours();
    hours = (hours < 10) ? "0" + hours : hours;
    var minutes = current_datetime.getMinutes();
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    var seconds = current_datetime.getSeconds();
    seconds = (seconds < 10) ? "0" + seconds : seconds;
    let formatted_date = current_datetime.getFullYear() + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;
    return formatted_date;
},

// show all tasks in table
showAllTasks: function () {
    var html = "";
 
    // get all projects
    var projects = this.getAllProjects();
    for (var a = 0; a < projects.length; a++) {
        projects[a].tasks = projects[a].tasks.reverse();
 
        // get tasks in each project
        for (var b = 0; b < projects[a].tasks.length; b++) {
            html += "<tr>";
                html += "<td>" + projects[a].tasks[b].name + "</td>";
                html += "<td>" + projects[a].name + "</td>";
                if (projects[a].tasks[b].isStarted) {
                    html += "<td><label name='date' class='started'>Started</label></td>";
                } else {
                    if (projects[a].tasks[b].status == "Completed") {
                        html += "<td><label class='completed'>" + projects[a].tasks[b].status + "</label></td>";
                    } else {
                        html += "<td>" + projects[a].tasks[b].status + "</td>";
                    }
                }
 
                // get total duration of each task using it's logs
                var duration = 0;
                for (var c = 0; c < projects[a].tasks[b].logs.length; c++) {
                    var log = projects[a].tasks[b].logs[c];
                    if (log.endTime > 0) {
                        duration += log.endTime - log.startTime;
                    }
                }
 
                // convert millisecond into hours, minutes and seconds
                duration = Math.abs((duration / 1000).toFixed(0));
                var hours = Math.floor(duration / 3600) % 24;
                hours = (hours < 10) ? "0" + hours : hours;
                // var days = Math.floor(diff / 86400);
                var minutes = Math.floor(duration / 60) % 60;
                minutes = (minutes < 10) ? "0" + minutes : minutes;
                var seconds = duration % 60;
                seconds = (seconds < 10) ? "0" + seconds : seconds;
 
                // show timer if task is already started
                if (projects[a].tasks[b].isStarted) {
                    var dataStartedObj = {
                        "duration": duration,
                        "project": projects[a].id,
                        "task": projects[a].tasks[b].id
                    };
                    html += "<td data-started='" + JSON.stringify(dataStartedObj) + "'>" + hours + ":" + minutes + ":" + seconds + "</td>";
                } else {
                    html += "<td>" + hours + ":" + minutes + ":" + seconds + "</td>";
                }
 
                // show task duration if completed
                if (projects[a].tasks[b].status == "Completed") {
                    html += "<td>" + projects[a].tasks[b].started + "<br><span style='margin-left: 30px;'>to</span><br>" + projects[a].tasks[b].ended + "</td>";
                } else {
                    html += "<td>" + projects[a].tasks[b].started + "</td>";
                }
 
                // form to change task status
                html += "<td>";
                    html += "<form method='POST' id='form-change-task-status-" + projects[a].id + projects[a].tasks[b].id + "'>";
                        html += "<input type='hidden' name='project' value='" + projects[a].id + "'>";
                        html += "<input type='hidden' name='task' value='" + projects[a].tasks[b].id + "'>";
                        html += "<select class='form-control' name='status' onchange='taskObj.changeTaskStatus(this);' data-form-id='form-change-task-status-" + projects[a].id + projects[a].tasks[b].id + "'>";
                            html += "<option value=''>Change status</option>";
                            if (projects[a].tasks[b].isStarted) {
                                html += "<option value='stop'>Stop</option>";
                            } else {
                                html += "<option value='start'>Start</option>";
                            }
                            if (projects[a].tasks[b].status == "Progress") {
                                html += "<option value='complete'>Mark as Completed</option>";
                            } else {
                                html += "<option value='progress'>Make in Progress Again</option>";
                            }
                            html += "<option value='delete'>Delete</option>";
                        html += "</select>";
                    html += "</form>";
                html += "</td>";
            html += "</tr>";
        }
    }
    document.getElementById("all-tasks").innerHTML = html;
},

// change task status
changeTaskStatus: function (self) {
 
    // if task is not selected
    if (self.value == "") {
        return;
    }
 
    // loop through all projects
    var formId = self.getAttribute("data-form-id");
    var form = document.getElementById(formId);
    var projects = this.getAllProjects();
    for (var a = 0; a < projects.length; a++) {
 
        // if project matches
        if (projects[a].id == form.project.value) {
 
            // loop through all tasks of that project
            for (var b = 0; b < projects[a].tasks.length; b++) {
 
                // if task matches
                if (projects[a].tasks[b].id == form.task.value) {
 
                    // if the status is set to delete
                    if (self.value == "delete") {
 
                        // ask for confirmation
                        swal({
                            title: "Are you sure?",
                            text: "Deleting the task will delete its hours too.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
 
                                // remove task from array
                                projects[a].tasks.splice(b, 1);
 
                                // update local storage
                                localStorage.setItem(this.key, JSON.stringify(projects));
 
                                // re-load all tasks
                                this.showAllTasks();
                            } else {
 
                                // reset dropdown
                                self.value = "";
                            }
                        });
                    } else if (self.value == "complete") {
                        // mark as completed
                        projects[a].tasks[b].status = "Completed";
 
                        // stop the timer
                        projects[a].tasks[b].isStarted = false;
 
                        // log end time
                        projects[a].tasks[b].ended = this.getCurrentTimeInTaskStartEndFormat();
                        for (var c = 0; c < projects[a].tasks[b].logs.length; c++) {
                            if (projects[a].tasks[b].logs[c].endTime == 0) {
                                projects[a].tasks[b].logs[c].endTime = new Date().getTime();
                                break;
                            }
                        }
                    } else if (self.value == "progress") {
                        // mark as in progress
                        projects[a].tasks[b].status = "Progress";
 
                        // stop the timer
                        projects[a].tasks[b].isStarted = false;
                    } else if (self.value == "start") {
                        // ask for confirmation
                        swal({
                            title: "Are you sure?",
                            text: "This will start the timer.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((doStart) => {
                            if (doStart) {
                                 
                                // mark as started
                                projects[a].tasks[b].isStarted = true;
 
                                // add in log
                                var logObj = {
                                    id: projects[a].tasks[b].logs.length,
                                    startTime: new Date().getTime(),
                                    endTime: 0
                                };
                                projects[a].tasks[b].logs.push(logObj);
 
                                // update local storage
                                localStorage.setItem(this.key, JSON.stringify(projects));
 
                                // re-load all tasks
                                this.showAllTasks();
                            } else {
 
                                // reset dropdown
                                self.value = "";
                            }
                        });
                    } else if (self.value == "stop") {
 
                        // ask for confirmation
                        swal({
                            title: "Are you sure?",
                            text: "This will stop the timer.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((doStop) => {
                            if (doStop) {
 
                                // mark as stopped
                                projects[a].tasks[b].isStarted = false;
 
                                // update end time in log
                                for (var c = 0; c < projects[a].tasks[b].logs.length; c++) {
                                    if (projects[a].tasks[b].logs[c].endTime == 0) {
                                        projects[a].tasks[b].logs[c].endTime = new Date().getTime();
                                        break;
                                    }
                                }
 
                                // update local storage
                                localStorage.setItem(this.key, JSON.stringify(projects));
 
                                // re-load tasks
                                this.showAllTasks();
                            } else {
 
                                // reset dropdown
                                self.value = "";
                            }
                        });
                    }
                    break;
                }
            }
            break;
        }
    }
 
    // delete, start and stop are already handled above
    if (self.value == "delete"
        || self.value == "start"
        || self.value == "stop") {
        //
    } else {
        // update local storage and re-load tasks
        localStorage.setItem(this.key, JSON.stringify(projects));
        this.showAllTasks();
    }
},

};


// when page loads
window.addEventListener("load", function () {
    // show all projects and tasks
    taskObj.loadAllProjects();
    taskObj.showAllTasks();
    
    // call this function each second
setInterval(function () {
 
    // increment 1 second in all running tasks
    var dataStarted = document.querySelectorAll("td[data-started]");
    for (var i = 0; i < dataStarted.length; i++) {
        var dataStartedObj = dataStarted[i].getAttribute("data-started");
        var dataStartedObj = JSON.parse(dataStartedObj);
        dataStartedObj.duration++;
 
        // convert timestamp into readable format
        var hours = Math.floor(dataStartedObj.duration / 3600) % 24;
        hours = (hours < 10) ? "0" + hours : hours;
        // var days = Math.floor(diff / 86400);
        var minutes = Math.floor(dataStartedObj.duration / 60) % 60;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        var seconds = dataStartedObj.duration % 60;
        seconds = (seconds < 10) ? "0" + seconds : seconds;
        dataStarted[i].innerHTML = hours + ":" + minutes + ":" + seconds;
 
        // update log end time
        var projects = taskObj.getAllProjects();
        for (var a = 0; a < projects.length; a++) {
            if (projects[a].id == dataStartedObj.project) {
                for (var b = 0; b < projects[a].tasks.length; b++) {
                    if (projects[a].tasks[b].id == dataStartedObj.task) {
                        for (var c = 0; c < projects[a].tasks[b].logs.length; c++) {
                            if (c == projects[a].tasks[b].logs.length - 1) {
                                projects[a].tasks[b].logs[c].endTime = new Date().getTime();
 
                                // update local storage
                                window.localStorage.setItem(taskObj.key, JSON.stringify(projects));
 
                                // update timer
                                dataStarted[i].setAttribute("data-started", JSON.stringify(dataStartedObj));
 
                                break;
                            }
                        }
                        break;
                    }
                }
                break;
            }
        }
    }
}, 1000);
});
</script>