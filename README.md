## Assignment Objective

You are required to analyze and write unit tests for an existing, simplified Inventory Management module of an ERP system developed in Laravel. Additionally, you are tasked with enhancing the module by implementing a cost analysis feature and ensuring its seamless interaction with a basic Sales module. Keep in mind there is an assumption that the Sales and Purchases Management Modules is managed by a different team member.

Project Details:

The attached code "project.zip"  Inventory Management Module and Sales and Purchases Management Modules. These modules have basic functionalities like adding, updating, viewing, and deleting.

Your tasks are as follows:

### Task 1:

Implement a cost analysis feature. This should calculate the total cost of all items currently in the inventory. This should be a separate method within the Inventory Controller, which returns the total cost when called.

### Task 2:

Analyze the code. Based on your understanding, write a comprehensive set of unit tests to verify the correctness and robustness of the Inventory Management Module.

### Task 3:

Suppose there's a Sales module that interacts with the Inventory module. When a sale is made, the quantity of the sold item decreases in the inventory. Write an analysis and integration plan for this interaction, focusing on the potential challenges and solutions in keeping the inventory quantities and costs updated. (No actual code is required for this task)

### Technical Requirements:

Your solution should follow the best practices for writing tests and coding in Laravel.
Make use of Laravel's built-in testing tools.

### Testing Requirements:

Write unit tests to cover all main functionalities, including addition, updating, viewing, deletion of inventory items, cost analysis feature, and future interaction with the Sales module in mind.
Ensure your tests cover potential edge cases such as trying to add items with the same name, negative or zero quantity, etc.
Write a brief analysis report explaining the current code structure, the tests you have written, and the design of the added features.

### Estimated Time:

This assignment should take about 6 hours to complete.

### Submission:

Please submit your tests, enhanced code, and your analysis report via email. If there are any special instructions to run the tests or the code, include them in your email or in the report. before "Friday 4 august 2023 8:00 PM (GMT+3)"