// Get the current date
let today = new Date();

// Month names
const monthNames = [
  "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

// Generate calendar
function generateCalendar() {
  const calendar = document.getElementById("calendar");
  const monthYear = document.getElementById("monthYear");

  // Clear previous calendar
  calendar.innerHTML = "";

  // Add month and year header
  monthYear.innerText = monthNames[today.getMonth()] + " " + today.getFullYear();

  // Get the number of days in the current month
  const daysInMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate();

  // Create date elements for each day
  for (let day = 1; day <= daysInMonth; day++) {
    const dateElement = document.createElement("div");
    dateElement.classList.add("date");
    dateElement.innerText = day;

    if (day === today.getDate() && today.getMonth() === new Date().getMonth() && today.getFullYear() === new Date().getFullYear()) {
      dateElement.classList.add("active");
    }

    dateElement.addEventListener("click", openPopup);
    calendar.appendChild(dateElement);
  }
}

// Update calendar when navigating to previous month
function goToPreviousMonth() {
  today = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
  generateCalendar();
}

// Update calendar when navigating to next month
function goToNextMonth() {
  today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
  generateCalendar();
}

// Open popup form
function openPopup() {
    // Set the clicked date in the popup form
    const selectedDate = this.innerText;
    document.getElementById("date").value = selectedDate;
  
    // Show the popup
    $("#popup").modal("show");
  }

// Set button click event for previous and next month buttons
document.getElementById("prevMonthBtn").addEventListener("click", goToPreviousMonth);
document.getElementById("nextMonthBtn").addEventListener("click", goToNextMonth);

// Set button click event for the set button in the popup
document.getElementById("setBtn").addEventListener("click", function() {
  // Get the selected date and time
  const selectedDate = document.getElementById("date").value;
  const selectedTime = document.getElementById("time").value;

  // Do something with the selected date and time (e.g., save it, display it, etc.)
  console.log("Selected Date:", selectedDate);
  console.log("Selected Time:", selectedTime);

  // Close the popup
  $("#popup").modal("hide");
});

// Generate the initial calendar
generateCalendar();
