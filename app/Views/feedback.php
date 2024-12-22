<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Feedback Form</h4>
                </div>
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
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Feedback</label>
                            <div class="form-check">
                                <input type="radio" name="fback" id="feedbackPoor" value="Poor"
                                    class="form-check-input">
                                <label for="feedbackPoor" class="form-check-label">Poor</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="fback" id="feedbackGood" value="Good"
                                    class="form-check-input">
                                <label for="feedbackGood" class="form-check-label">Good</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="fback" id="feedbackVeryGood" value="Very Good"
                                    class="form-check-input">
                                <label for="feedbackVeryGood" class="form-check-label">Very Good</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="fback" id="feedbackExcellent" value="Excellent"
                                    class="form-check-input">
                                <label for="feedbackExcellent" class="form-check-label">Excellent</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="textbox" class="form-label">Any Suggestion</label>
                            <textarea name="textbox" id="textbox" class="form-control" rows="5"
                                placeholder="Enter your suggestions here"></textarea>
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