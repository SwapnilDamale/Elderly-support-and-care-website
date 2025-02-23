app.controller("myAccount", function ($scope, $rootScope) {
  $scope.selectedTab = "home"; // Initialize the selected tab
  $scope.user = user; // Initialize user data

  $scope.selectedOption = ""; // Initialize selected option

  // Function to show a specific option
  $scope.showOption = function (option) {
    $scope.selectedOption = option;
  };

  // Function to select a tab
  $scope.selectTab = function (tab) {
    $scope.selectedTab = tab;
    $scope.selectedOption = ""; // Reset selected option when changing tabs
  };

  $scope.deleteReason = ""; // Initialize delete reason

  // Function to confirm account deletion
  $scope.confirmDelete = function () {
    counter = 1;
    // Handle the account deletion logic here
    const indexToDelete = $rootScope.users.findIndex(
      (User) => User.username === user.username
    );

    // Check if the user was found
    if (indexToDelete !== -1) {
      // Use splice to remove the user from the array
      $rootScope.users.splice(indexToDelete, 1);

      // Remove user's booking history
      $rootScope.bookingHistory = $rootScope.bookingHistory.filter(
        (booking) => booking.username !== user.username
      );

      user = undefined; // Clear the current user
      window.location.href = "#/"; // Redirect to the home page
    }

    // You can include code to send a request to your server to delete the account
    // Also, you can use $scope.deleteReason to capture the reason for deleting (if provided)

    // For demonstration purposes, we'll simply display a confirmation message here
    $rootScope.users.$scope.selectedOption = ""; // Hide the "Delete Account" section
    $scope.deleteReason = ""; // Reset the delete reason
    $scope.confirmationMessage = "Your account has been deleted.";
  };

  // Function to confirm user logout
  $scope.confirmLogout = function () {
    counter = 1;
    // Handle the log out logic here
    user = undefined; // Clear the current user
    window.location.href = "#/"; // Redirect to the home page

    // You can include code to clear user session, etc.

    // For demonstration purposes, we'll display a confirmation message here
    $scope.selectedOption = ""; // Hide the "Log Out" section
    $scope.logoutConfirmationMessage = "You have been logged out successfully.";
  };

  // Function to change user password
  $scope.changePassword = function () {
    if ($scope.passwordOld === user.password) {
      if (
        $scope.passwordNew === $scope.passwordConfirm &&
        $scope.passwordNew !== ""
      ) {
        let index = $rootScope.users.findIndex(
          (el) => el.username === user.username
        );

        $rootScope.users[index].password = $scope.passwordNew;
        $scope.passwordOld = "";
        $scope.passwordNew = "";
        $scope.passwordConfirm = "";
        $scope.passwordChangeMessage = "Password changed successfully.";
      }else{
        $scope.passwordChangeMessage =
        "Password doesn't match.";
      }
    } else if ($scope.passwordOld !== user.password) {
      $scope.passwordChangeMessage =
        "Old password is incorrect.";
    }
  };

  // Function to get the current user's booking history
  $scope.currentUserBookingHistory = function () {
    let userHistory = $rootScope.bookingHistory.filter(
      (booking) => booking.username === user.username
    );

    return userHistory;
  };
});
