<?php

session_start();

include "db.php";

header("Content-Type: application/json");


// ==========================================
// CHECK LOGIN
// ==========================================

if (!isset($_SESSION["user_id"])) {

    echo json_encode([
        "success" => false,
        "message" => "Please login first."
    ]);

    exit;
}


// ==========================================
// CHECK STAFF
// ==========================================

if ($_SESSION["role"] !== "staff") {

    echo json_encode([
        "success" => false,
        "message" => "Access denied."
    ]);

    exit;
}


$staff_id = $_SESSION["user_id"];

$action = $_REQUEST["action"] ?? "";


// ==========================================
// GET ASSIGNED COMPLAINTS
// ==========================================

if ($action === "get_complaints") {


    $stmt = $conn->prepare(

        "SELECT
            c.id,
            c.subject,
            c.category,
            c.description,
            c.location,
            c.status,
            c.response,
            c.created_at,
            u.name AS student_name

        FROM complaints c

        INNER JOIN users u
        ON c.user_id = u.id

        WHERE c.assigned_to = ?

        ORDER BY c.id DESC"

    );


    $stmt->bind_param(
        "i",
        $staff_id
    );


    $stmt->execute();


    $result =
        $stmt->get_result();


    $complaints = [];


    while (
        $row =
        $result->fetch_assoc()
    ) {

        $complaints[] = $row;

    }


    echo json_encode([

        "success" => true,

        "complaints" => $complaints

    ]);


    $stmt->close();

    exit;
}


// ==========================================
// UPDATE COMPLAINT
// ==========================================

if ($action === "update_complaint") {


    $complaint_id =
        $_POST["complaint_id"] ?? 0;


    $status =
        $_POST["status"] ?? "";


    $response =
        $_POST["response"] ?? "";


    $allowed_statuses = [

        "Pending",
        "In Progress",
        "Resolved",
        "Rejected"

    ];


    if (
        !in_array(
            $status,
            $allowed_statuses
        )
    ) {

        echo json_encode([

            "success" => false,

            "message" => "Invalid status."

        ]);

        exit;
    }


    // Check that this complaint
    // actually belongs to this staff member

    $check =
        $conn->prepare(

            "SELECT id

             FROM complaints

             WHERE id = ?

             AND assigned_to = ?"

        );


    $check->bind_param(

        "ii",

        $complaint_id,

        $staff_id

    );


    $check->execute();


    $result =
        $check->get_result();


    if ($result->num_rows === 0) {

        echo json_encode([

            "success" => false,

            "message" =>
                "You are not assigned to this complaint."

        ]);

        exit;
    }


    // Update complaint

    $stmt =
        $conn->prepare(

            "UPDATE complaints

             SET status = ?,
                 response = ?

             WHERE id = ?

             AND assigned_to = ?"

        );


    $stmt->bind_param(

        "ssii",

        $status,

        $response,

        $complaint_id,

        $staff_id

    );


    if ($stmt->execute()) {

        echo json_encode([

            "success" => true,

            "message" =>
                "Complaint updated successfully."

        ]);

    } else {

        echo json_encode([

            "success" => false,

            "message" =>
                "Failed to update complaint."

        ]);

    }


    $stmt->close();

    $check->close();

    exit;
}


// ==========================================
// INVALID ACTION
// ==========================================

echo json_encode([

    "success" => false,

    "message" => "Invalid action."

]);


$conn->close();

?>