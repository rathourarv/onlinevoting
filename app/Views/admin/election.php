<div class="container">
    <h2>Elections</h2>
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
    <form method="POST" class="mb-4" action="election/add">
        <div class="row">
            <div class="col-md-3">
                <label for="electionName" class="form-label">Election Name</label>
                <input type="text" name="electionName" id="electionName" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="electionType" class="form-label">Election Type</label>
                <select id="electionType" name="electionType" class="form-control">
                    <option selected>LOK_SABHA</option>
                    <option>VIDHAN_SABHA</option>
                    <option>MUNICIPAL</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" name="startDate" id="startDate" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" name="endDate" id="endDate" class="form-control" required>
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add Election</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Election Id</th>
                <th scope="col">Election Name</th>
                <th scope="col">Election Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Result</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($elections as $election_id => $election): ?>
                <tr>
                    <td><?php echo htmlspecialchars($election["id"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($election["electionType"]); ?></td>
                    <td><?php echo htmlspecialchars($election["startDate"]); ?></td>
                    <td><?php echo htmlspecialchars($election["endDate"]); ?></td>
                    <td><a href=<?php echo "election/remove/{$election['id']}" ?>>Remove</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>