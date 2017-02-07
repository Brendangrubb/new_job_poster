<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpeningClass.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css'>
                <title>Job Board</title>
            </head>
            <body>
                <div class='container'>
                    <h1>Post a Job</h1>
                    <form action='/output'>
                        <div class='form-group'>
                            <h3 for='job_title'>Enter a Job Title:</h3>
                            <input id='job_title' class='form-control' name='job_title'>
                        </div>
                        <div class='form-group'>
                            <h3 for='job_description'>Enter a Job Description</h3>
                            <textarea id='job_description' class='form-control' rows='3' placeholder='Please enter a description of the job' name='job_description'></textarea>
                        </div>
                        <div class='form-group'>
                            <h3 for='job_contact'>Enter a Contact for the Position:</h3>
                            <input id='job_contact' class='form-control' name='job_contact'>
                        </div>
                        <button type='submit' class='btn'>Submit Job</button>
                    </form>
                </div>
            </body>
        </html>
        ";
    });

    $app->get("/output", function() {
            $new_job = new JobOpening($_GET['job_title'], $_GET['job_contact'], $_GET['job_description']);
            $title = $new_job->GetJobTitle();
            $new_job->SetJobTitle($title);
            $rev_title = $new_job->GetJobTitle();
            $contact = $new_job->GetJobContact();
            $description = $new_job->GetJobDescription();

            if ($title) {
                return "
                <!DOCTYPE html>
                <html>
                    <head>
                        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css'>
                        <title>Job Board Output</title>
                    </head>
                    <body>
                        <div class='container'>
                            <h1>" . $rev_title . "</h1><br><h2>" . $contact . "</h2><br><h3>" . $description . "</h3>
                            <h5><a href='/'>add another job listing</a></h5>
                        </div>
                    </body>
                </html>
                ";
            } else {
                return "
                <!DOCTYPE html>
                <html>
                    <head>
                        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css'>
                        <title>Job Board Output</title>
                    </head>
                    <body>
                        <div class='container'>
                            <h2>Please Enter a Job Title</h2>
                            <h5><a href='/'>back to form</a></h5>

                        </div>
                    </body>
                </html>
                ";
            }


    });

    return $app;
 ?>
