document.addEventListener('DOMContentLoaded', function () {
    const checkBillsTab = document.getElementById('check-bills-tab');

    checkBillsTab.addEventListener('click', function () {
      fetch('get_bills.php')
        .then(response => response.json())
        .then(data => {
          if (data.length > 0) {
            const bill = data[0]; // Assuming you want to display the first outstanding bill
            document.getElementById('bill-id').value = bill.bill_id;
            document.getElementById('meter-id').value = bill.meter_id;
            document.getElementById('billing-date-from').value = bill.bill_period_begin;
            document.getElementById('billing-date-to').value = bill.bill_period_end;
            document.getElementById('water-consumption').value = bill.consumption;
            document.getElementById('billing-amount').value = bill.bill_amount;
          } else {
            alert('No outstanding bills found.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });

    
  });