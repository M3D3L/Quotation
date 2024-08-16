import { getBackgroundColorClass } from "../utilities/customColors.js";

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
             <span class="detail-key">Code: </span>
             <p class="detail-value">${item.code}</p>
            </div>
            <p class="amount-value">$${item.amount.toFixed(2)}</p>
          </div>
       </div>
    </li>
  `;
}

export function renderBreakdownCards(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = dataArray
      .map((item, index) => generateBreakdownCard(item, index))
      .join("");
  }
}
