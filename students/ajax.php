<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "e-learning";
$connect;

try {
    $connect =
        new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
};


if (isset($_POST['row_no'])) {
    $row = $_POST['row_no'];
    $id = $_SESSION['pageid'];
    $row = $row-1;
    $query = ("SELECT * FROM question WHERE examid = :id LIMIT $row, 1");
    $smt = $connect->prepare($query);
    $smt->execute(array(':id' => $id));
    $question = $smt->fetch(PDO::FETCH_ASSOC);
    $count = 1;

    echo '<div class="mb-3 px-3 py-2 Regular shadow rounded border border-dark" style="background: #fff;">
                    <p style="font-weight: bolder;font-size:larger;">
                        '.$count;' &nbsp;&nbsp;'.$question['questiontitle'];'
                    </p>
                    <div class="form-check px-1">
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><'.$question['option1']; '
                            </label>
                        </div>
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><'.$question['option2']; '
                            </label>
                        </div>
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><'.$question['option3'];'
                            </label>
                        </div>
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><'.$question['option4']; '
                            </label>
                        </div>
                    </div>
                </div>';
    exit();
}
