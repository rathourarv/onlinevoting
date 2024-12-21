<div class="container">
    <div class="row" id="main">
        <div class="col-md-12">
            <fieldset>
                <legend>Feedback Form:</legend>
                <?php if (isset($validation)): ?>
                    <div class="alert alert-warning">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="/feedback" method="POST" name="rform">
                    <table>
                        <tr>
                            <td>Your Name</td>
                            <td><input type="text" name="name" id="name"></td>
                        </tr>
                        <tr>
                            <td>Email-Id</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Feedback</td>
                            <td>
                                <input type="radio" name="fback" value="Poor">Poor
                                <input type="radio" name="fback" value="Good">Good
                                <input type="radio" name="fback" value="Very Good">Very Good
                                <input type="radio" name="fback" value="Excllent">Excllent
                            </td>
                        </tr>
                        <tr>
                            <td>Any Suggestion</td>
                            <td>
                                <textarea name="textbox" cols=40 rows=5 style="text-align:left"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2 align="center">
                                <input type="submit" name="submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>