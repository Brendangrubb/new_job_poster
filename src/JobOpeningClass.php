<?php
    class JobOpening
    {
        private $job_title;
        private $job_contact;
        private $job_description;

        function __construct($job_title, $job_contact, $job_description)
        {
            $this->job_title = $job_title;
            $this->job_contact = $job_contact;
            $this->job_description = $job_description;
        }

        function SetJobTitle($job_title)
        {
            $this->job_title = strtoupper($job_title);
        }
        function SetJobContact($job_contact)
        {
            $this->job_contact = strtoupper($job_contact);
        }
        function SetJobDescription($job_description)
        {
            $this->job_description = strtoupper($job_description);
        }

        function GetJobTitle()
        {
            return $this->job_title;
        }
        function GetJobContact()
        {
            return $this->job_contact;
        }
        function GetJobDescription()
        {
            return $this->job_description;
        }

    }

?>
