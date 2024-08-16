export function generateDynamicTable(dataArray) {
  // Extract column names from the first object in the array
  const columns = dataArray.length > 0 ? Object.keys(dataArray[0]) : [];

  return `
    <table class="custom-table">
      <thead>
        <tr class="custom-table-header">
          ${columns
            .map(col => `<th class="custom-table-cell">${formatColumnName(col)}</th>`)
            .join("")}
        </tr>
      </thead>
      <tbody>
        ${dataArray
          .map(
            (item) => `
          <tr class="custom-table-row">
            ${columns
              .map(col => `<td class="custom-table-cell" data-label="${formatColumnName(col)}">${item[col] || ''}</td>`)
              .join("")}
          </tr>
        `
          )
          .join("")}
      </tbody>
    </table>
  `;
}

// Function to format column names (e.g., "unitNumber" -> "Unit Number")
function formatColumnName(columnName) {
  return columnName
    .replace(/([A-Z])/g, ' $1')
    .replace(/^./, str => str.toUpperCase());
}


export function renderDynamicTable(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateDynamicTable(dataArray);
  }
}
