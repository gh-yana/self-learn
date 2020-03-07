print('start')

import sam_webcam_cap
import sam_img_detect
import sam_postIMG_2Slack

for i in range(3):
    print(i)
    sam_webcam_cap.proc()
    sam_img_detect.proc()
    sam_postIMG_2Slack.proc()
else:
    print('end')

