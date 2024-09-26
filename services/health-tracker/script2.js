document.addEventListener("DOMContentLoaded", function () {
	var submitButton = document.getElementById("submit");
	var editSection = document.getElementById("editSection");
	var waterInput = document.getElementById("water");
	var exerciseInput = document.getElementById("exercise");
	var bloodSugarLevelInput = document.getElementById("bloodsugerlevel");
	var outputTableBody = document.getElementById("output");

	submitButton.addEventListener("click", function () {
		// Get input values
		var water = waterInput.value;
		var exercise = exerciseInput.value;
		var bloodSugarLevel = bloodSugarLevelInput.value;

		// Validate inputs (you can add more validation)
		if (!water || !exercise || !bloodSugarLevel) {
			alert("Please fill in all fields.");
			return;
		}

		// Get current date
		var currentDate = new Date().toLocaleDateString();

		// Add a new row to the table
		var newRow = "<tr>" +
			"<td>" + currentDate + "</td>" +
			"<td>" + water + "</td>" +
			"<td>" + exercise + "</td>" +
			"<td>" + bloodSugarLevel + "</td>" +
			"<td><button class='edit-btn' onclick='editRow(this)'><i class='fas fa-edit'></i></button></td>" +
			"<td><button class='delete-btn' onclick='deleteRow(this)'><i class='fas fa-trash'></i></button></td>" +
			"</tr>";

		outputTableBody.innerHTML += newRow;

		// Clear input fields
		waterInput.value = "";
		exerciseInput.value = "";
		bloodSugarLevelInput.value = "";
	});

	window.editRow = function (button) {
		var currentRow = button.closest("tr");

		// Fill input fields with row data
		waterInput.value = currentRow.cells[1].textContent;
		exerciseInput.value = currentRow.cells[2].textContent;
		bloodSugarLevelInput.value = currentRow.cells[3].textContent;

		// Show edit section and hide submit button
		editSection.classList.remove("hidden");
		submitButton.classList.add("hidden");

		// Store current row for updating later
		editSection.currentRow = currentRow;
	};

	window.cancelEdit = function () {
		// Hide edit section and show submit button
		editSection.classList.add("hidden");
		submitButton.classList.remove("hidden");

		// Clear input fields
		waterInput.value = "";
		exerciseInput.value = "";
		bloodSugarLevelInput.value = "";
	};

	window.updateRow = function () {
		var currentRow = editSection.currentRow;

		// Update row data
		currentRow.cells[1].textContent = waterInput.value;
		currentRow.cells[2].textContent = exerciseInput.value;
		currentRow.cells[3].textContent = bloodSugarLevelInput.value;

		// Hide edit section and show submit button
		editSection.classList.add("hidden");
		submitButton.classList.remove("hidden");

		// Clear input fields
		waterInput.value = "";
		exerciseInput.value = "";
		bloodSugarLevelInput.value = "";
	};

	window.deleteRow = function (button) {
		var currentRow = button.closest("tr");

		// Add the delete-animation class to initiate the animation
		currentRow.classList.add("delete-animation");

		// Remove the row after the animation completes
		setTimeout(function () {
			currentRow.remove();
		}, 500); // Adjust the timeout to match the animation duration (0.5s in this case)
	};
});