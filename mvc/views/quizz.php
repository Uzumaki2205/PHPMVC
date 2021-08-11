<form method="POST" action="/PHPMVC/Question/SubmitQuestion">
        <div class="row g-3 mb-3 needs-validation">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">MSSV</label>
                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $_SESSION['username'] ?>" name="mssv" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Name</label>
                <input type="text" class="form-control" id="validationCustom02" name="name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomEmail" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" class="form-control" id="validationCustomEmail" aria-describedby="inputGroupPrepend" name="email" value="<?php echo $_SESSION['email'] ?>" required>
                    <div class="invalid-feedback">
                        Please choose a email.
                    </div>
                </div>
            </div>
        </div>


        <?php $i = 1;
        foreach ($data['questions'] as $question) { ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Question <?php echo $i . ': ' . $question['Title'] . ' - ' . $question['Description'] . ' (' . $question['Point'] . 'đ)' ?></h5>
                    <span style="margin-bottom: 20px;">Type: <?php echo $question['TypeQuestion'] ?></span>
                    <div class="list-group form-check">
                        <label class="list-group-item">
                            <input class="form-check-input me-1 question-a" type="radio" name="result<?php echo $question['Id'] ?>" value="1" required>
                            <?php echo $question['ANS_A'] ?>
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1 question-b" type="radio" name="result<?php echo $question['Id'] ?>" value="2" required>
                            <?php echo $question['ANS_B'] ?>
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1 question-c" type="radio" name="result<?php echo $question['Id'] ?>" value="3" required>
                            <?php echo $question['ANS_C'] ?>
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1 question-d" type="radio" name="result<?php echo $question['Id'] ?>" value="4" required>
                            <?php echo $question['ANS_D'] ?>
                        </label>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>
        <button class="btn btn-primary mb-3" style="width: 100%;" name="submit" type="submit">Submit</button>
    </form>

<!-- <div class="columns">
  <div class="column">
    <div class="field">
			<label class="label">MSSV</label>
			<div class="control">
				<input class="input" type="text" placeholder="Enter MSSV" name="username">
			</div>
		</div>
  </div>
  <div class="column">
    <div class="field">
			<label class="label">Name</label>
			<div class="control">
				<input class="input" type="text" placeholder="Enter name" name="name">
			</div>
		</div>
  </div>
  <div class="column">
    <div class="field">
			<label class="label">Email</label>
			<div class="control">
				<input class="input" type="email" placeholder="Email" name="email">
			</div>
		</div>
  </div>
</div>

<div class="card">
	<div class="card-content">
		<div class="content">
			Lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.
		</div>
	</div>
</div> -->