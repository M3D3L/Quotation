// Define custom colors equivalent to Tailwind gray shades with increments of 50
const customColors = [
  "#f9fafb", // bg-gray-50
  "#f3f4f6", // bg-gray-100
  "#e5e7eb", // bg-gray-200
  "#d6d8da", // bg-gray-300
  "#9ca3af", // bg-gray-400
];

// Utility function to generate a background color class based on index
function getBackgroundColorClass(index) {
  const totalColors = customColors.length;
  const colorIndex = index % totalColors;
  return customColors[colorIndex];
}

// Function to generate client info section
export function generateClientInfoSection(client) {
  return `
    <div class="client-info">
       <div>
          <p class="client-address">${client.address}</p>
          <p class="client-city-state-zip">${client.cityStateZip}</p>
          <p class="client-phone">${client.phone}</p>
       </div>
       <div class="quotation-info">
          <h1 class="quotation-title">Quotation</h1>
          <p class="quotation-date"><strong>Date:</strong> ${client.quotationDate}</p>
          <p class="quotation-number"><strong>Quotation #:</strong> ${client.quotationNumber}</p>
          <p class="customer-id"><strong>Customer ID:</strong> ${client.customerId}</p>
       </div>
       <div class="quotation-details">
          <p><strong>Quotation For:</strong></p>
          <p>${client.quotationFor}</p>
          <p class="valid-until"><strong>Quotation valid until:</strong> ${client.quotationValidUntil}</p>
          <p><strong>Prepared by:</strong> ${client.preparedBy}</p>
       </div>
       <div class="originating-po">
          <p><strong>Originating P.O:</strong> ${client.originatingPO}</p>
       </div>
    </div>
    `;
}

// Function to render client info section
export function renderClientInfoSection(containerId, client) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateClientInfoSection(client);
  }
}

// Function to create a card element for a unit
export function generateUnitCard(item, index) {
  const backgroundColor = getBackgroundColorClass(index);
  return `
    <li class="unit-card" style="background-color: ${backgroundColor};">
       <h2 class="unit-title">Unit # ${item.unit}</h2>
       <div class="unit-details">
          ${Object.entries(item)
            .map(
              ([key, value]) => `
          <div class="unit-detail">
             <span class="detail-key">${key
               .replace(/([A-Z])/g, " $1")
               .replace(/^./, (str) => str.toUpperCase())}:</span>
             <p class="detail-value">${value}</p>
          </div>
          `
            )
            .join("")}
       </div>
    </li>
    `;
}

// Function to render a list of unit cards
export function renderUnitCards(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = dataArray
      .map((item, index) => generateUnitCard(item, index))
      .join("")
  }
  
}

// Function to create a description section
export function generateDescriptionSection(description) {
  return `
    <div class="description-section">
       <p>${description}</p>
    </div>
    `;
}

// Function to render the description section
export function renderDescriptionSection(containerId, description) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateDescriptionSection(description);
  }
}

// Function to create a breakdown element
export function generateBreakdownCard(item, index) {
  const backgroundColor = getBackgroundColorClass(index);
  return `
    <li class="breakdown-card" style="background-color: ${backgroundColor};">
       <h2 class="breakdown-title">${item.description}</h2>
       <div class="breakdown-details">
          <div class="breakdown-detail">
             <span class="detail-key">Unit Price:</span>
             <p class="detail-value">$${item.unitPrice.toFixed(2)} x ${
    item.quantity
  }</p>
          </div>
          <div class="flex-row">

            <div class="breakdown-detail hide-border">
             <span class="detail-key">Code:</span>
             <p class="detail-value">${item.code}</p>
          </div>
            <p class="amount-value">$${item.amount.toFixed(2)}</p>
          </div>
       </div>
    </li>
    `;
}

// Function to render a list of breakdown cards
export function renderBreakdownCards(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = dataArray
      .map((item, index) => generateBreakdownCard(item, index))
      .join("");
  }
}

// Function to create a total cost card
export function generateTotalCostCard(dataArray) {
  const totalAmount = dataArray.reduce((sum, item) => sum + item.amount, 0);
  return `
    <div class="total-cost-card">
       <h2 class="total-cost-title">Total Cost</h2>
       <div class="total-cost-details">
          <span class="total-cost-label">TOTAL:</span>
          <p class="total-cost-value">$${totalAmount.toFixed(2)}</p>
       </div>
    </div>
    `;
}

// Function to render the total cost card
export function renderTotalCostCard(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateTotalCostCard(dataArray);
  }
}
