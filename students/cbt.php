<?php

require_once 'header.php';
require_once '../server/classes/fetchData.php';
$id = $_GET['id'];
$_SESSION['pageid'] = $id;
// $fetchData = new fetchData();
// $question = $fetchData->displayQuestion($id);
?>
<script>
    function getData(no,id) {
        
        $.ajax({
            type: 'post',
            url: 'ajax.php',
            data: {
                row_no: no,
                id: id
            },
            success: function(response) {
                document.getElementById("paginate").innerHTML = response;
            }
        });
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="text-center">
        <h3>Take Quiz</h3>
        <h4>Answer Correctly the Questions</h4>
        <p>Please ensure you choose your answers correctly as any wrong choice can not be reversed after Submission.</p>
    </div>
    <div class="col-lg-8 offset-lg-2 mt-4">
        <?php
        $count = 1;
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "e-learning";
        $connect;

        try {
            $connect = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        };

        $query = "SELECT * FROM question WHERE examid = $id";

        $stmt = $connect->prepare($query);
        $stmt->execute(array());
        $pages = $stmt->rowCount();
        $question = $stmt->fetch(PDO::FETCH_OBJ);
        ?>

        <form action="" method="post">
            <div id="paginate">
                <div class="mb-3 px-3 py-2 Regular shadow rounded border border-dark" style="background: #fff;">
                    <p style="font-weight: bolder;font-size:larger;">
                        <?php echo $count; ?>.&nbsp;&nbsp;<?php echo $question->questiontitle; ?>
                    </p>
                    <div class="form-check px-1">
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $question->option1; ?>
                            </label>
                        </div>
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $question->option2; ?>
                            </label>
                        </div>
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $question->option3; ?>
                            </label>
                        </div>
                        <div class="bg-light rounded py-2 my-2 pl-2">
                            <label class="form-check-label normal-label">
                                <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $question->option4; ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination " id="total">
                            <li class="page-item">
                                <a href="?page=" class="page-link">Prev</a>
                            </li>
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>

                                <li class="page-item">
                                    <a role="button" class="page-link" onclick="getData(<?php echo $i,$id ?>)" data-value="<?php echo $i?>"><?php echo $i; ?></a>
                                </li>

                            <?php endfor; ?>
                            <li class="page-item">
                                <a href="?page=" class="page-link">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-6 text-right">
                    <button class="btn btn-success text-light btn-rounded waves-effect waves-light" name="btnAdd" type="submit">Submit</button>
                </div>
            </div>
        </form>
        <?php $count += 1 ?>;


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require_once 'footer.php';
?>

<!-- https://www.daniweb.com/programming/web-development/threads/508092/pagination-with-while-loop -->