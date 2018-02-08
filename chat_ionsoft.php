<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>CHAT</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-messaging.js"></script>

    <script>
        // Initialize Firebase
        var config = {
            apiKey: "apiKey",
            authDomain: "projectId.firebaseapp.com",
            databaseURL: "https://databaseName.firebaseio.com",
            projectId: "",
            storageBucket: "bucket.appspot.com",
            messagingSenderId: ""
        };
        firebase.initializeApp(config);

        // Get a reference to the database service
        var database = firebase.database();

        function writeUserData(userId, name, email, imageUrl) {
            firebase.database().ref('users/' + userId).set({
                username: name,
                email: email,
                profile_picture : imageUrl
            });
        }
        function writeData(name, email, imageUrl) {
            var postData = {
                username: name,
                email: email,
                profile_picture : imageUrl
            };
            // Get a key for a new Post.
            var newPostKey = firebase.database().ref('users/').push().key;
            // Write the new post's data simultaneously in the posts list and the user's post list.
            var updates = {};
            updates['/users/' + newPostKey] = postData;
            firebase.database().ref().update(updates);
        }
        function send() {
            var userInput = document.getElementById('input').value;
            var postData = {
                username: userInput
            };
            // Get a key for a new Post.
            var newPostKey = firebase.database().ref('prof/').push().key;
            // Write the new post's data simultaneously in the posts list and the user's post list.
            var updates = {};
            updates['/prof/' + newPostKey] = postData;
            firebase.database().ref().update(updates);
        }


        var commentsRef = firebase.database().ref('prof/');
        commentsRef.on('child_added', function(data) {
            $("#boxchat").append("<div>"+data.val().username+"</div>");
        });

        commentsRef.on('child_changed', function(data) {

        });

        commentsRef.on('child_removed', function(data) {

        });
    </script>
</head>
<body style="font-family:Verdana">
<?php date_default_timezone_set('asia/jakarta');?>
<div class="container">
    <div class="row " style="padding-top:40px;">
        <h3 class="text-center" > CHAT IONSoft </h3>
        <br /><br />
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    RECENT CHAT HISTORY
                </div>
                <div class="panel-body">
                    <ul class="media-list">

                        <li class="media">

                            <div class="media-body">

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="assets/img/woman.png" />
                                    </a>
                                    <div class="media-body" >
                                        <div id="boxchat"></div>
                                        <br />
                                        <small class="text-muted"><?php echo getenv("username"); ?> | <?php echo date('d-M-Y h:i:sa')?></small>
                                        <hr />
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="media">

                            <div class="media-body">

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="assets/img/man.png" />
                                    </a>
                                    <div class="media-body" >
                                        <div>ini text</div>
                                        <br />
                                        <small class="text-muted"><?php echo getenv("username"); ?> | <?php echo date('d-M-Y h:i:sa')?></small>
                                        <hr />
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Message" id="input"/>
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="send()">SEND</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function changeText2(){
                var userInput = document.getElementById('userInput').value;
                document.getElementById('boldStuff2').innerHTML = userInput;
            }
        </script>
        <p>Welcome to the site <b id='boldStuff2'>dude</b> </p>
        <input type='text' id='userInput' value='Enter Text Here' />
        <input type='button' onclick='changeText2()' value='Change Text'/>
        <!--<div class="col-md-4">-->
            <!--<div class="panel panel-primary">-->
                <!--<div class="panel-heading">-->
                    <!--ONLINE USERS-->
                <!--</div>-->
                <!--<div class="panel-body">-->
                    <!--<ul class="media-list">-->

                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.png" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Alex Deo | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.gif" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Jhon Rexa | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.png" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Alex Deo | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.gif" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Jhon Rexa | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.png" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Alex Deo | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.gif" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Jhon Rexa | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.png" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Alex Deo | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="media">-->

                            <!--<div class="media-body">-->

                                <!--<div class="media">-->
                                    <!--<a class="pull-left" href="#">-->
                                        <!--<img class="media-object img-circle" style="max-height:40px;" src="assets/img/user.gif" />-->
                                    <!--</a>-->
                                    <!--<div class="media-body" >-->
                                        <!--<h5>Jhon Rexa | User </h5>-->

                                        <!--<small class="text-muted">Active From 3 hours</small>-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</div>-->
            <!--</div>-->

        <!--</div>-->
    </div>
</div>
</body>
</html>
