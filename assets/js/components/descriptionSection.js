export function generateDescriptionSection(description) {
  return `
      <div class="description-section">
         <p>${description}</p>
      </div>
    `;
}

export function renderDescriptionSection(containerId, description) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateDescriptionSection(description);
  }
}
