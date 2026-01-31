<?php
include "config/db.php";

$isEdit = false;


$data = [
  'type' => '',
  'fullName' => '',
  'mobile' => '',
  'email' => '',
  'address' => '',
  'state' => '',
  'district' => '',
  'city' => '',
  'license' => '',
  'gst' => '',
  'goodsType' => '',
  'demand' => '',
  'rate' => '',
  'remarks' => ''
];

if (isset($_GET['id'])) {
  $isEdit = true;
  $id = $_GET['id'];

  $res = mysqli_query($conn, "SELECT * FROM tenders WHERE id=$id");
  $data = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $isEdit ? "Update Tender" : "Add Tender" ?></title>

    <style>

      
       body {
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    padding: 40px;
    min-height: 100vh;

    background:
        radial-gradient(
            ellipse at center,
            #f7f9fb 0%,
            #e3e9ee 40%,
            #cfd8dc 100%
        );
}

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            overflow: hidden;
        }

        .header {
            background: #f5f7ff;
            padding: 20px 30px;
            border-bottom: 1px solid #ddd;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .step {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
        }

        form {
            padding: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #444;
        }

        input, select, textarea {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 8px;
        }

        .full {
            grid-column: span 2;
        }

        .files input {
            border: none;
        }

        button {
            margin-top: 30px;
            padding: 12px;
            width: 100%;
            background: #6a7cff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #5668e2;
        }

        
.radio-box {
    border: 1px solid #dcdcdc;
    border-radius: 8px;
    padding: 14px 16px;
    background: #fafafa;
}

.radio-group {
    display: flex;
    gap: 25px;
    margin-top: 10px;
}

/* Make radio labels clickable & clean */
.radio-group label {
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
    cursor: pointer;
}

/* Slightly bigger radio */
.radio-group input[type="radio"] {
    transform: scale(1.1);
}

    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h2><?= $isEdit ? "Update Tender" : "Tender Form" ?></h2>
        
    </div>

    <form method="POST"
          action="<?= $isEdit ? 'update.php' : 'create.php' ?>"
          enctype="multipart/form-data">

        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>

        <div class="grid">

            <div class="field">
                <label>Type *</label>
                <select name="type" required>
                    <option value="">Select</option>
                    <option <?= $data['type']=="Broker"?'selected':'' ?>>Broker</option>
                    <option <?= $data['type']=="Purchaser"?'selected':'' ?>>Purchaser</option>
                    <option <?= $data['type']=="Wholesaler"?'selected':'' ?>>Wholesaler</option>
                </select>
            </div>

            <div class="field">
                <label>Full Name *</label>
                <input type="text" name="fullName" value="<?= $data['fullName'] ?>" required>
            </div>

            <div class="field">
                <label>Mobile *</label>
                <input type="text" name="mobile" maxlength="10"
                       oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                       value="<?= $data['mobile'] ?>" required>
            </div>

            <div class="field">
                <label>Email *</label>
                <input type="email" name="email" value="<?= $data['email'] ?>" required>
            </div>

            <div class="field full">
                <label>Address</label>
                <input type="text" name="address" value="<?= $data['address'] ?>">
            </div>

            <div class="field">
                <label>State</label>
                <input type="text" name="state" value="<?= $data['state'] ?>">
            </div>

            <div class="field">
                <label>District</label>
                <input type="text" name="district" value="<?= $data['district'] ?>">
            </div>

            <div class="field">
                <label>City</label>
                <input type="text" name="city" value="<?= $data['city'] ?>">
            </div>

            <div class="field">
    <label>License *</label>
    <div class="radio-box">
        <div class="radio-group">
            <label>
                <input type="radio" name="license" value="Yes"
                <?= $data['license']=="Yes"?'checked':'' ?>> Yes
            </label>

            <label>
                <input type="radio" name="license" value="No"
                <?= $data['license']=="No"?'checked':'' ?>> No
            </label>
        </div>
    </div>
</div>


           <div class="field">
    <label>GST *</label>
    <div class="radio-box">
        <div class="radio-group">
            <label>
                <input type="radio" name="gst" value="Yes"
                <?= $data['gst']=="Yes"?'checked':'' ?>> Yes
            </label>

            <label>
                <input type="radio" name="gst" value="No"
                <?= $data['gst']=="No"?'checked':'' ?>> No
            </label>
        </div>
    </div>
</div>


            <div class="field">
                <label>Goods Type *</label>
                <select name="goodsType">
                    <option <?= $data['goodsType']=="Ash"?'selected':'' ?>>Ash</option>
                    <option <?= $data['goodsType']=="Sugar"?'selected':'' ?>>Sugar</option>
                    <option <?= $data['goodsType']=="Ethanol"?'selected':'' ?>>Ethanol</option>
                    <option <?= $data['goodsType']=="Pressmud"?'selected':'' ?>>Pressmud</option>
                </select>
            </div>

            <div class="field">
                <label>Demand</label>
                <input type="text" name="demand" value="<?= $data['demand'] ?>">
            </div>

            <div class="field">
                <label>Rate</label>
                <input type="text" name="rate" value="<?= $data['rate'] ?>">
            </div>

            <div class="field full">
                <label>Remarks</label>
                <textarea name="remarks"><?= $data['remarks'] ?></textarea>
            </div>

            <div class="field full files">
                <label>Upload Documents</label>
                <input type="file" name="passportPhoto">
                <input type="file" name="aadhar">
                <input type="file" name="pan">
                <input type="file" name="gstCert">
                <input type="file" name="licenseCert">
            </div>

        </div>

        <button type="submit">
            <?= $isEdit ? "Update Tender" : "Submit Tender" ?>
        </button>

    </form>

</div>

</body>
</html>
