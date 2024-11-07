let roomOwnerId = null;
let handleMemberJoined = async (MemberId) => {
    console.log('A new member has joined the room:', MemberId)
    addMemberToDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)

    if (members.length === 1) {
        roomOwnerId = MemberId;
        addBotMessageToDom(`Bây giờ bạn là chủ phòng.`);
    } else {
        await requestRoomOwnerApproval(MemberId);
    }
    let {name} = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])
    addBotMessageToDom(`Welcome to the room ${name}! 👋`)
}

let requestRoomOwnerApproval = async (MemberId) => {
    let ownerName = await rtmClient.getUserAttributesByKeys(roomOwnerId, ['name']);
    let memberName = await rtmClient.getUserAttributesByKeys(MemberId, ['name']);

    // Gửi tin nhắn yêu cầu chủ phòng phê duyệt
    addBotMessageToDom(`${memberName.name} muốn tham gia phòng. Đang chờ phê duyệt từ ${ownerName.name}...`);

    // Chờ chủ phòng phê duyệt hoặc từ chối
    let approved = await getApprovalFromOwner(MemberId);
    if (approved) {
        addBotMessageToDom(`${ownerName.name} đã chấp nhận yêu cầu của ${memberName.name} vào phòng.`);
        addMemberToDom(MemberId); // Thêm thành viên vào DOM
    } else {
        addBotMessageToDom(`${ownerName.name} đã từ chối yêu cầu của ${memberName.name} vào phòng.`);
    }
};

let getApprovalFromOwner = async (MemberId) => {
    let { name } = await rtmClient.getUserAttributesByKeys(MemberId, ['name']);

    // Tạo HTML cho modal
    let modalHtml =
        `<div class="modal" tabindex="-1" id="approvalModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chấp nhận ${name} vào phòng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="denyBtn">Không đồng ý</button>
                        <button type="button" class="btn btn-primary" id="approveBtn">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>`;

    document.body.insertAdjacentHTML('beforeend', modalHtml);

    let approvalModal = new bootstrap.Modal(document.getElementById('approvalModal'));
    approvalModal.show();

    // Trả về một Promise để chờ phản hồi
    return new Promise((resolve) => {
        document.getElementById('approveBtn').onclick = () => {
            approvalModal.hide();
            resolve(true); // Phê duyệt
        };

        document.getElementById('denyBtn').onclick = () => {
            approvalModal.hide();
            resolve(false); // Từ chối
        };
    });
};

let addMemberToDom = async (MemberId) => {
    let {name} = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])

    let membersWrapper = document.getElementById('member__list')
    let memberItem = `<div class="member__wrapper" id="member__${MemberId}__wrapper">
                        <span class="green__icon"></span>
                        <p class="member_name">${name}</p>
                    </div>`

    membersWrapper.insertAdjacentHTML('beforeend', memberItem)
}

let updateMemberTotal = async (members) => {
    let total = document.getElementById('members__count')
    total.innerText = members.length
}

let handleMemberLeft = async (MemberId) => {
    removeMemberFromDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)
}

let removeMemberFromDom = async (MemberId) => {
    let memberWrapper = document.getElementById(`member__${MemberId}__wrapper`)
    let name = memberWrapper.getElementsByClassName('member_name')[0].textContent
    addBotMessageToDom(`${name} has left the room.`)

    memberWrapper.remove()
}

let getMembers = async () => {
    let members = await channel.getMembers()
    updateMemberTotal(members)
    for (let i = 0; members.length > i; i++){
        addMemberToDom(members[i])
    }
}

let handleChannelMessage = async (messageData, MemberId) => {
    console.log('A new message was received')
    let data = JSON.parse(messageData.text)

    if(data.type === 'chat'){
        addMessageToDom(data.displayName, data.message)
    }

    if(data.type === 'user_left'){
        document.getElementById(`user-container-${data.uid}`).remove()

        if(userIdInDisplayFrame === `user-container-${uid}`){
            displayFrame.style.display = null

            for(let i = 0; videoFrames.length > i; i++){
                videoFrames[i].style.height = '300px'
                videoFrames[i].style.width = '300px'
            }
        }
    }
}

let sendMessage = async (e) => {
    e.preventDefault()

    let message = e.target.message.value
    channel.sendMessage({text:JSON.stringify({'type':'chat', 'message':message, 'displayName':displayName})})
    addMessageToDom(displayName, message)
    e.target.reset()
}

let addMessageToDom = (name, message) => {
    let messagesWrapper = document.getElementById('messages')

    let newMessage = `<div class="message__wrapper">
                        <div class="message__body">
                            <strong class="message__author">${name}</strong>
                            <p class="message__text">${message}</p>
                        </div>
                    </div>`

    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    let lastMessage = document.querySelector('#messages .message__wrapper:last-child')
    if(lastMessage){
        lastMessage.scrollIntoView()
    }
}


let addBotMessageToDom = (botMessage) => {
    let messagesWrapper = document.getElementById('messages')

    let newMessage = `<div class="message__wrapper">
                        <div class="message__body__bot">
                            <strong class="message__author__bot">🤖 Jobbox Bot</strong>
                            <p class="message__text__bot">${botMessage}</p>
                        </div>
                    </div>`

    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    let lastMessage = document.querySelector('#messages .message__wrapper:last-child')
    if(lastMessage){
        lastMessage.scrollIntoView()
    }
}

let leaveChannel = async () => {
    await channel.leave()
    await rtmClient.logout()
}

window.addEventListener('beforeunload', leaveChannel)
let messageForm = document.getElementById('message__form')
messageForm.addEventListener('submit', sendMessage)
