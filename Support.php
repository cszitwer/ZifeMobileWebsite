<?php session_start();
include 'include/header.php'; ?>


<div class="jumbotron">
    <h1 class="display-4"><b>Need Help?</b></h1>
    <p class="lead"><b>Ask one of our Experts!</b></p>
    <hr class="my-4">
    <p>Must be signed in to get a response or include your phone/email, otherwise feel free to leave comments here ;)<br></p>
    <p><b>Click on the button below and leave a message at <b>sales@zifemobile.com</b> and one of our representitives will assist you as soon as possible.<br> Or call <b>347-946-2228</b></b></p>
</div>

<div class="messageButton">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="sales@zifemobile.com">Send message to zifemobile</button></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request or Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method='post' action='mail.php'>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" name="email">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="message-text" id='message' class="col-form-label" name="message">Message:</label>
                        <textarea class="form-control" id="message-text" name="message-text"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="formSubmit" value="submit">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>

