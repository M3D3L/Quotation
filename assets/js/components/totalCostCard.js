export function generateTotalCostCard(dataArray) {
  const totalAmount = dataArray.reduce((sum, item) => sum + item.amount, 0);
  return `
      <div class="total-cost-card">
         <h2 class="total-cost-title">Total Cost</h2>
         <p class="total-cost-value">$${totalAmount.toFixed(2)}</p>
      </div>
    `;
}

export function renderTotalCostCard(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateTotalCostCard(dataArray);
  }
}
