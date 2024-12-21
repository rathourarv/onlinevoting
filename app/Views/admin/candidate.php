<div class="container">
    <h2>Candidates</h2>
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
    <form method="POST" class="mb-4" action="candidate/add">
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
                <label for="partyID" class="form-label">Party Name</label>
                <select id="partyID" name="partyID" class="form-control">
                    <?php foreach ($parties as $party): ?>
                        <option value=<?php echo $party["id"] ?>><?php echo $party["partyName"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="electionID" class="form-label">Election Name</label>
                <select id="electionID" name="electionID" class="form-control">
                    <?php foreach ($elections as $election): ?>
                        <option value=<?php echo $election["id"] ?>><?php echo $election["electionName"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label for="constituencyID" class="form-label">Constituency Name</label>
                <select id="constituencyID" name="constituencyID" class="form-control">
                    <?php foreach ($constituencies as $constituency): ?>
                        <option value=<?php echo $constituency["id"] ?>><?php echo $constituency["constituencyName"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end" style="margin-top:25px">
                <button type="submit" name="add" class="btn btn-primary w-100">Add Candidate</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Index</th>
                <th scope="col">Candidates ID</th>
                <th scope="col">Candidates Name</th>
                <th scope="col">Party Name</th>
                <th scope="col">Election Name</th>
                <th scope="col">Constituency Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidateID => $candidate): ?>
                <tr>
                    <td><?php echo htmlspecialchars($candidateID); ?></td>
                    <td><?php echo htmlspecialchars($candidate["id"]); ?></td>
                    <td><?php echo htmlspecialchars(sprintf("%s %s", $candidate["firstName"], $candidate["lastName"])); ?>
                    </td>
                    <td><?php echo htmlspecialchars($candidate["partyName"]); ?></td>
                    <td><?php echo htmlspecialchars($candidate["electionName"]); ?></td>
                    <td><?php echo htmlspecialchars($candidate["constituencyName"]); ?></td>
                    <td><a href=<?php echo "candidate/remove/{$candidate['id']}" ?>>Remove</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>