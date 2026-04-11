export type MembershipType = {
    id: number;
    name: string;
}

export type Membership = {
    id: number;
    member_id: number;
    membership_type_id: number;
    membership_type: MembershipType;
}

export type Member = {
    id: number;
    name: string;
    code: string;
    gender: string;
    birth_date: string;
    photo: string;
    status?: string;
    current_membership?: Membership | null;
}
