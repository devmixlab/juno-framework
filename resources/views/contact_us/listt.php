<?php foreach($component->messages() as $msg): ?>
    Name - {{ $msg['name'] }}<br />
    Email - {{ $msg['email'] }}<br />
    Message - {{ $msg['message'] }}<br />
    <hr />
<?php endforeach; ?>