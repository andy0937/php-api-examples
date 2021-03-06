<?php
/**
 * Copyright 2016 OneAll, LLC.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 *
 */

// OK

// HTTP Handler and Configuration
include '../assets/config.php';

// LoudVoice API \ List discussion comments

// Comments for this discussions
$discussion_token = '9c868349-319b-49fa-9830-c1407dd9b8fc';

// The page to retrieve
$page = 1;

// Entries per page
$entries_per_page = 150;

// Newest first
$order_direction = 'asc';

// Make Request
$oneall_curly->get (SITE_DOMAIN . "/loudvoice/discussions/" . $discussion_token . "/comments.json?page=" . $page . "&entries_per_page=" . $entries_per_page . "&order_direction=" . $order_direction);
$result = $oneall_curly->get_result ();

// Success
if ($result->http_code == 200)
{
	echo "<h1>Success " . $result->http_code . "</h1>";
	echo "<pre>" . oneall_pretty_json::format_string ($result->body) . "</pre>";
}
// Error
else
{
	echo "<h1>Error " . $result->http_code . "</h1>";
	echo "<pre>" . oneall_pretty_json::format_string ($result->body) . "</pre>";
}