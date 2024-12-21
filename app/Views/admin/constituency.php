<div class="container">
    <h2>Constituencies</h2>
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
    <form method="POST" class="mb-4" action="constituency/add">
        <div class="row">
            <div class="col-md-4">
                <label for="constituencyName" class="form-label">Constituency Name</label>
                <input type="text" name="constituencyName" id="constituencyName" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="type" class="form-label">Type</label>
                <select id="type" name="type" class="form-control">
                    <option selected>GENERAL</option>
                    <option>SC</option>
                    <option>ST</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add constituency</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Constituency ID</th>
                <th scope="col">Constituency Name</th>
                <th scope="col">Constituency State</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($constituencies as $constituencyID => $constituency): ?>
                <tr>
                    <td><?php echo htmlspecialchars($constituency["id"]); ?></td>
                    <td><?php echo htmlspecialchars($constituency["constituencyName"]); ?></td>
                    <td><?php echo htmlspecialchars($constituency["state"]); ?></td>
                    <td><?php echo htmlspecialchars($constituency["type"]); ?></td>
                    <td><a href=<?php echo "constituency/remove/{$constituency['id']}" ?>>Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>