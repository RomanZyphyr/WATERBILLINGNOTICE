document.addEventListener('DOMContentLoaded', function () {
    const inboxTab = document.getElementById('inbox-tab');
    const blockquote = document.querySelector('#inbox blockquote');
    const cardHeader = document.querySelector('#inbox .card-header');

    inboxTab.addEventListener('click', function () {
      fetch('check_bill.php')
        .then(response => response.json())
        .then(data => {
          if (data.hasBill) {
            blockquote.querySelector('p').textContent = 'Your monthly bills have arrived. Please check your bills and water consumption!';
            blockquote.querySelector('footer cite').textContent = 'Administrator';
            cardHeader.textContent = 'New messages';
          } else {
            blockquote.querySelector('p').textContent = 'No bill records yet!';
            blockquote.querySelector('footer cite').textContent = '';
            cardHeader.textContent = 'No messages';
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  });