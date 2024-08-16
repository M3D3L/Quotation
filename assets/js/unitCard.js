import { getBackgroundColorClass } from "./customColors.js";

export function generateUnitCard(item, index) {
  const backgroundColor = getBackgroundColorClass(index);
  return `
    <li class="unit-card" style="background-color: ${backgroundColor};">
       <h2 class="unit-title">Unit # ${item.unit}</h2>
       <div class="unit-details">
          ${Object.entries(item)
            .map(([key, value]) =>
              key !== "unit"
                ? `<div class="unit-detail">
                     <span class="detail-key">${key
                       .replace(/([A-Z])/g, " $1")
                       .replace(/^./, (str) => str.toUpperCase())}:</span>
                     <p class="detail-value">${value}</p>
                   </div>`
                : ""
            )
            .join("")}
       </div>
    </li>
  `;
}

export function renderUnitCards(containerId, dataArray) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = dataArray
      .map((item, index) => generateUnitCard(item, index))
      .join("");
  }
}
