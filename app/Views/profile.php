<div class="container">
    <h2>Update Profile Details</h2>
    <hr>
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
    <form method="POST" action=<?php echo "profile" ?>>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                    value=<?php echo $profile['firstName'] ?? "" ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"
                    value=<?php echo $profile['lastName'] ?? "" ?>>
            </div>
            <div class="form-group col-md-4">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="friendly Username"
                    value=<?php echo $profile['username'] ?? "" ?>>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value=<?php echo $profile['email'] ?? "" ?> readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile" value=<?php echo $profile['mobile'] ?? "" ?>>
            </div>
        </div>

        <button type="submit" class="btn btn-primary update-profile-button">Update Profile</button>
    </form>
</div>