export const customColors = [
  "rgba(249, 250, 251, 0.65)", // bg-gray-50
  "rgba(243, 244, 246, 0.65)", // bg-gray-100
  "rgba(229, 231, 235, 0.65)", // bg-gray-200
  "rgba(214, 216, 218, 0.65)", // bg-gray-300
  "rgba(156, 163, 175, 0.65)", // bg-gray-400
];

// Utility function to generate a background color class based on index
export function getBackgroundColorClass(index) {
  const totalColors = customColors.length;
  const colorIndex = index % totalColors;
  return customColors[colorIndex];
}
