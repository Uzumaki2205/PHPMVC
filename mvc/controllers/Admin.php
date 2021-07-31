<?php
class Admin extends Controller
{
    private $admin_model;
    private $question_model;
    private $report_model;

    function __construct()
    {
        $this->admin_model = $this->model('AdminModel');
        $this->question_model = $this->model('QuestionModel');
        $this->report_model = $this->model('ReportModel');
    }

    function Index()
    {
        $this->view('admin/index');
    }

    function AllQuestion() {
        $questions = $this->question_model->Question();
        $this->view('admin/all_question', ["questions"=> $questions]);
    }

    function CreateQuestion() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
           $this->view('admin/create_question');
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
        $isSuccess = $this->question_model->CreateQuestion(
            $_POST['title'],
            $_POST['description'],
            $_POST['type_question'],
            $_POST['point_question'],
            $_POST['answer_A'],
            $_POST['answer_B'],
            $_POST['answer_C'],
            $_POST['answer_D'],
            $_POST['result']);

        echo '<script>alert("'. $isSuccess .'")</script>';
        header('location: ../Admin/CreateQuestion'); }
    }

    function DeleteQuestion()
    {
        if (isset($_POST['delete'])) {
            $result = $this->question_model->DeleteQuestion($_POST['id_question']);
            echo '<script>alert("'. $result .'");
            window.location.href="/PHPMVC/Admin/AllQuestion"; </script>';
        }
    }

    function Reports() {
        $reports = $this->report_model->Report();
        $this->view('admin/reports', ["reports"=> $reports]);
    }

    function DeleteReport()
    {
        if (isset($_POST['delete'])) {
            $result = $this->report_model->DeleteReport($_POST['id_report']);
            echo '<script>alert("'. $result .'");
            window.location.href="/PHPMVC/Admin/Reports"; </script>';
        }
    }

    function OS_Command_Injection() {
        $this->view('os-command-injection');
    }
}
