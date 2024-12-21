<div class="container">
    <h2>Voters</h2>
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
    <form method="POST" class="mb-4" action="user/add">
        <div class="row">
            <div class="col-md-2">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="number" name="mobile" class="form-control"
                    required />
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add User</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th colspan="3" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user["firstName"]); ?></td>
                    <td><?php echo htmlspecialchars($user["lastName"]); ?></td>
                    <td><?php echo htmlspecialchars($user["username"]); ?></td>
                    <td><?php echo htmlspecialchars($user["email"]); ?></td>
                    <td><?php echo htmlspecialchars($user["mobile"]); ?></td>
                    <td><a href=<?php echo "user/remove/{$user['id']}" ?>>Remove</a></td>
                    <td><a href=<?php echo "profile/{$user['id']}" ?>>Edit</a></td>
                    <td><a href=<?php echo "user/resend-password/{$user['id']}" ?>>Resend</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>