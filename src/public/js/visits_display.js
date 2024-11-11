function searchVisits() {
    // Get dates from form inputs
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    // Check if dates are entered
    if (!startDate || !endDate) {
        alert('Please select both start and end dates.');
        return;
    }

    // Send AJAX request without CSRF token
    fetch('/list_visits?start_date=' + startDate + '&end_date=' + endDate)
        .then(response => response.json())
        .then(data => {
            // Clear previous results
            const resultsBody = document.getElementById('resultsBody');
            resultsBody.innerHTML = '';

            let visits = data.visits;
            // Check if there are results
            if (visits.length > 0) {
                visits.forEach(visit => {
                    // Clone the template row
                    const templateRow = document.getElementById('resultTemplateRow');
                    const visitRow = templateRow.cloneNode(true);

                    // Remove the 'hidden' class and 'id' attribute
                    visitRow.classList.remove('hidden');
                    visitRow.removeAttribute('id');  // Remove the ID to avoid duplicates

                    // Populate data into the cloned row
                    visitRow.querySelector('.visit-url').innerText = visit.url;
                    visitRow.querySelector('.visit-unique-visits').innerText = visit.unique_visits;

                    // Append the cloned row to the results body
                    resultsBody.appendChild(visitRow);
                });
                document.getElementById('results').classList.remove('hidden');
            } else {
                resultsBody.innerHTML = '<tr><td colspan="3" class="text-red-500 p-4">No visits found for the selected date range.</td></tr>';
            }
        });
}
