<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-white">
                    <h2 class="card-title">Feedback Form</h2>
                </div>
                <hr>
                <div class="card-body">
                    <!-- Display Validation Errors -->
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($message)): ?>
                        <div class="alert alert-success">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <form action="/feedback" method="POST" name="rform">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-2 col-form-label">Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value=<?php echo $name?> readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-2 col-form-label">Email: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value=<?php echo $email?> readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Feedback:</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fback" id="poor" value="Poor">
                                    <label class="form-check-label" for="poor">Poor</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fback" id="good" value="Good">
                                    <label class="form-check-label" for="good">Good</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fback" id="very-good"
                                        value="Very Good">
                                    <label class="form-check-label" for="very-good">Very Good</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fback" id="excellent"
                                        value="Excellent">
                                    <label class="form-check-label" for="excellent">Excellent</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="textbox" class="col-sm-2 col-form-label">Suggestion: </label>
                            <div class="col-sm-10">
                                <textarea name="textbox" id="textbox" class="form-control" rows="4"
                                    placeholder="Enter your suggestions here"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>