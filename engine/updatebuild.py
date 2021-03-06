import time

copyrightText = "/*\n * (C) Copyright 2012 David J. W. Li\n * Project DLPWEBENGINE\n */"
fileName = "buildversion.php"

file = open(fileName,'r')
nextVersion = -1
lastTime = -1
if file:
    f=file.readlines()
    versionLine = ''
    timeLine = ''
    for line in f:
        if line.startswith("$GLOBALS['_SITE_BUILD']"):
            versionLine = line
        if line.startswith("$GLOBALS['_SITE_BUILD_TIME']"):
            timeLine = line

    nextVersion = int((versionLine.split('=')[1]).split(';')[0]) + 1
    lastTime = int((timeLine.split('=')[1]).split(';')[0])
    file.close()

if (lastTime + 60) < time.time():
    if nextVersion > 0:
        file = open(fileName,'w')
        if file:
            print "Build version: ", nextVersion
            file.truncate()
            file.write("<?\n")
            file.write(copyrightText)
            file.write("\n\n\n")
            file.write("//AUTO-GENERATED FILE - DO NOT EDIT\n")
            file.write("$GLOBALS['_SITE_BUILD']={0};\n".format(nextVersion))
            file.write("$GLOBALS['_SITE_BUILD_TIME']={0};\n".format(int(time.time())))
        file.close()
else:
    print "Save Spamming Detected!"
