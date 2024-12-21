<div class="container">
    <h2>Political Parties</h2>
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
    <form method="POST" class="mb-4" action="party/add">
        <div class="row">
            <div class="col-md-3">
                <label for="partyName" class="form-label">Party Name</label>
                <input type="text" name="partyName" id="partyName" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="leaderName" class="form-label">Leader Name</label>
                <input type="text" name="leaderName" id="leaderName" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="partySymbol" class="form-label">Party symbol</label>
                <input type="text" name="partySymbol" id="partySymbol" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="foundedYear" class="form-label">Founded Year</label>
                <input type="number" name="foundedYear" min="1800" max="2024" step="1" value="1980" class="form-control"
                    required />
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add Party</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Party ID</th>
                <th scope="col">Party Name</th>
                <th scope="col">Party Leader</th>
                <th scope="col">Party Symbol</th>
                <th scope="col">Founed Year</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <hr>
        <tbody>
            <?php foreach ($parties as $partID => $party): ?>
                <tr>
                    <td><?php echo htmlspecialchars($party["id"]); ?></td>
                    <td><?php echo htmlspecialchars($party["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($party["leaderName"]); ?></td>
                    <td><?php echo htmlspecialchars($party["partySymbol"]); ?></td>
                    <td><?php echo htmlspecialchars($party["foundedYear"]); ?></td>
                    <td><a href=<?php echo "party/remove/{$party['id']}" ?>>Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>