import "./bootstrap";

import Alpine from "alpinejs";

import Sortable from "sortablejs/modular/sortable.complete.esm.js";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const taskList = document.getElementById("task-list");

    if (taskList) {
        const sortable = new Sortable(taskList, {
            animation: 150,
            onUpdate: async (event) => {
                const items = event.from.children;

                for (let index = 0; index < items.length; index++) {
                    const taskElement = items[index];
                    const taskId = taskElement.getAttribute("data-task-id");
                    const taskPriorityElement =
                        taskElement.querySelector(".text-gray-600");
                    taskPriorityElement.textContent =
                        "Priority: " + (index + 1);

                    // Send a request to update priority based on the new order
                    const response = await fetch(`/task/${taskId}/reorder`, {
                        method: "PATCH",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        body: JSON.stringify({
                            priority: index + 1,
                        }),
                    });

                    if (!response.ok) {
                        console.error(
                            "Failed to update priority for task with ID:",
                            taskId
                        );
                        // Handle error as needed
                    }
                }
            },
        });
    }
});
